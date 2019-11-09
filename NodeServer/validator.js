function Validator(query) {
    this.query=query;
    this.validateFirstname = async function (body, errors) {
        if (body.firstname == undefined) {
            errors.push('firstname is required');
        } else {
            if (body.firstname.length < 3) {
                errors.push('firstname is too short');
            } else if (body.firstname.length > 32) {
                errors.push('firstname is too long');
            }
        }
        return  body.firstname;
    }

    this.validateLastname = async function (body, errors) {
        if (body.lastname == undefined) {
            errors.push('lastname is required');
        } else {
            if (body.lastname.length < 3) {
                errors.push('lastname is too short');
            } else if (body.lastname.length > 32) {
                errors.push('lastname is too long');
            }
        }
        return  body.lastname;
    }
    this.validateCampus = async function (body, errors) {
        if (body.campus == undefined) {
            errors.push('campus is required');
        } else {
            let campusResult = await this.executeQuery('SELECT * FROM campus WHERE id=? OR location=?', [body.campus, body.campus]);
            if (campusResult.length > 0) {
                body.campus = campusResult[0].id;
            } else {
                errors.push('this campus does not exist');
            }
        }
        return  body.campus;
    }
    this.validateStatus = async function (body, errors) {
        if (body.status == undefined) {
            errors.push('status is required');
        } else {
            let statusResult = await this.executeQuery('SELECT * FROM status WHERE id=? OR name=?', [body.status, body.status]);
            if (statusResult.length > 0) {
                body.status = statusResult[0].id;
            } else {
                errors.push('this status does not exist');
            }
        }
        return  body.status;
    }
    this.validatePassword = async function (body, errors) {
        if (body.password == undefined) {
            errors.push('password is required');
        }
        return  body.password;
    }
    this.validateEmail = async function (body, errors,id=0) {
        if (body.email == undefined) {
            errors.push('email is required');
        } else {
            if (body.email.length < 1) {
                errors.push('email is too short');
            }
            if (body.email.length > 64) {
                errors.push('email is too long');
            }
            let emailResult = await this.executeQuery('SELECT * FROM users WHERE email=?', body.email);
            if (emailResult.length > 0 && emailResult[0].id!=id) {
                errors.push('email already exist');
            }
        }
        return  body.email;
    }
    return this;
}





module.exports = Validator;

