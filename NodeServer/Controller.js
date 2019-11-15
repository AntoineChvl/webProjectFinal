function Controller(connection) {
    this.executeQuery = (new require('./query')(connection)).executeQuery;
    this.validator = new require('./validator')(this.executeQuery);
    this.campusIndex = async function (request, res) {
        let result = await this.executeQuery('SELECT * FROM `campus`');
        res.json({status: 'success', 'result': result});
    }
    this.index = async function (request, res) {
        if (request.body.email !== undefined) {
            let result = await this.executeQuery('SELECT users.id,firstname,lastname,email,password,location as campus,name as status,status.id as statusLvl,rgpd_agreed,rgpd_date FROM `users` JOIN `campus` ON users.campus_id = campus.id JOIN `status` ON users.status_id = status.id WHERE email=?', request.body.email);
            res.json({status: 'success', 'result': result});
        } else {
            let result = await this.executeQuery('SELECT users.id,firstname,lastname,email,password,location as campus,name as status,status.id as statusLvl,rgpd_agreed,rgpd_date FROM `users` JOIN `campus` ON users.campus_id = campus.id JOIN `status` ON users.status_id = status.id');
            res.json({status: 'success', 'result': result});
        }
    }
    this.store = async function (request, res) {
        let errors = [];

        await this.validator.validateFirstname(request.body, errors);
        await this.validator.validateLastname(request.body, errors);
        await this.validator.validateCampus(request.body, errors);
        await this.validator.validatePassword(request.body, errors);
        await this.validator.validateEmail(request.body, errors);

        if (errors.length === 0) {
            let newUser = {
                email: request.body.email,
                firstname: request.body.firstname,
                lastname: request.body.lastname,
                password: request.body.password,
                campus_id: request.body.campus,
            };
            this.showFromId(res, (await this.executeQuery('INSERT INTO users SET ?', newUser)).insertId);
        } else {
            res.json({status: 'failed', 'errors': errors});
        }
    }
    this.show = async function (request, res) {
        this.showFromId(res, request.params.id);
    }
    this.update = async function (request, res) {
        let errors = []
        let updatedUser = {};

        if (request.body.firstname !== undefined) {
            updatedUser.firstname = await this.validator.validateFirstname(request.body, errors);
        }
        if (request.body.lastname !== undefined) {
            updatedUser.lastname = await this.validator.validateLastname(request.body, errors);
        }
        if (request.body.campus !== undefined) {
            updatedUser.campus_id = await this.validator.validateCampus(request.body, errors);
        }
        if (request.body.status_id !== undefined) {
            updatedUser.status_id = await this.validator.validateStatus(request.body, errors,request);
        }
        if (request.body.password !== undefined) {
            updatedUser.password = await this.validator.validatePassword(request.body, errors);
        }
        if (request.body.email !== undefined) {
            updatedUser.email = await this.validator.validateEmail(request.body, errors,request.params.id);
        }
        if (request.body.rgpd !== undefined) {
            updatedUser.rgpd_agreed = !!(request.body);
            updatedUser.rgpd_date = Date.now();
        }

        if (errors.length === 0) {
            let result = await this.executeQuery('UPDATE users SET ? WHERE id=?', [updatedUser, request.params.id]);
            this.showFromId(res, request.params.id);
        } else {
            res.json({status: 'failed', 'errors': errors});
        }
    }

    this.destroy = async function (request, res) {
        let result = await this.executeQuery('DELETE FROM `users` WHERE id=?', request.params.id);
        if (result.affectedRows > 0) {
            res.json({status: 'success'});
        } else {
            res.json({status: 'failed', 'errors': 'user #' + request.params.id + ' does not exist'});
        }
    }

    this.showFromId = async function (res, id) {
        let result = await this.executeQuery('SELECT users.id,firstname,lastname,email,password,location as campus,name as status,status.id as statusLvl FROM `users` JOIN `campus` ON users.campus_id = campus.id JOIN `status` ON users.status_id = status.id WHERE users.id=?', id);
        if (result[0]) {
            res.json({status: 'success', 'result': result[0]});
        } else {
            res.json({status: 'failed', 'errors': 'user #' + id + ' does not exist'});
        }
    }
    return this;
};


module.exports = Controller;

