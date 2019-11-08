function UserController() {
    this.connection = undefined;
    this.index = function (request, res, body) {
    	if(body.email!==undefined){
			this.connection.query('SELECT * FROM users WHERE email=?',body.email, (err, result) => {
				res.json({status: 'success', 'result': result});
			});
		}else {
			this.connection.query('SELECT * FROM users', (err, result) => {
				res.json({status: 'success', 'result': result});
			});
		}
    }
    this.store = function (request, res, body) {
        let errors = []

        if (body.firstname == undefined) {
            errors.push('firstname is required');
        } else if (body.firstname.length < 3) {
            errors.push('firstname is too short');
        } else if (body.firstname.length > 32) {
            errors.push('firstname is too long');
        }

        if (body.lastname == undefined) {
            errors.push('lastname is required');
        } else if (body.lastname.length < 3) {
            errors.push('lastname is too short');
        } else if (body.lastname.length > 32) {
            errors.push('lastname is too long');
        }

        if (body.password == undefined) {
            errors.push('password is required');
        }

        if (body.email == undefined) {
            errors.push('email is required');
        } else {
            if (body.email.length < 1) {
                errors.push('email is too short');
            }
            if (body.email.length > 64) {
                errors.push('email is too long');
            }
            this.connection.query('SELECT * FROM users WHERE email=?', body.email, (err, emailResult) => {
                if (emailResult.length > 0) {
                    errors.push('email already exist');
                }
                if (errors.length == 0) {
                    let newUser = {
                        email: body.email,
                        firstname: body.firstname,
                        lastname: body.lastname,
                        password: body.password
                    };
                    this.connection.query('INSERT INTO users SET ?', newUser, (err, r) => {
                        this.connection.query('SELECT * FROM users WHERE id=?', r.insertId, (err, result) => {
                            if (result[0]) {
                                res.json({status: 'success', 'result': result[0]});
                            } else {
                                res.json({
                                    status: 'failed',
                                    'errors': 'user #' + request.params.id + ' does not exist'
                                });
                            }
                        });
                    });
                } else {
                    res.json({status: 'failed', 'errors': errors});
                }
            });
        }
    }

    this.show = function (request, res, body) {
        this.connection.query('SELECT * FROM users WHERE id=?', request.params.id, (err, result) => {
            //if (err) throw err;
            if (result[0]) {
                res.json({status: 'success', 'result': result[0]});
            } else {
                res.json({status: 'failed', 'errors': 'user #' + request.params.id + ' does not exist'});
            }
        });
    }
    this.update = function (request, res, body) {
        let body = [];
        request.on('data', (chunk) => {
            body.push(chunk);
        }).on('end', () => {
            body = JSON.parse(Buffer.concat(body).toString());


            this.connection.query('UPDATE users SET ? WHERE id=?', [body, request.params.id], (err, result) => {
                if (err) throw err;
                this.show(request, res);
            });
        });
    }
    this.destroy = function (request, res, body) {
        this.connection.query('DELETE FROM `users` WHERE id=?', request.params.id, (err, result) => {
            if (err) throw err;
            if (result.affectedRows > 0) {
                res.json({status: 'success'});
            } else {
                res.json({status: 'failed', 'errors': 'user #' + request.params.id + ' does not exist'});
            }
        });
    }

};


module.exports = new UserController();

