const SERVER_HOST = '127.0.0.1';
const SERVER_PORT = 8080;

const DATABASE_HOST = '127.0.0.1';
const DATABASE_NAME = 'projetwebcentral';
const DATABASE_PORT = 3306;
const DATABASE_USER = 'root';
const DATABASE_PASSWORD = '';

//loading modules
const app = require('express')();//Routing
const mysql = require('mysql');//database connection
const bodyCatcher = require('./bodyCatcher.js');//my module which is here to get the body of the request
const jwt = require('jsonwebtoken');//token creation / verification
const fs = require('fs');//this module is used for reading files

//creating the connection to the database
const connection = mysql.createConnection({
    database: DATABASE_NAME,
    host: DATABASE_HOST,
    port: DATABASE_PORT,
    user: DATABASE_USER,
    password: DATABASE_PASSWORD,
});


const executeQuery = (new require('./query')(connection)).executeQuery;//loading my proper function to execute sql query
const hasher = require('crypto');//hash password

//connecting to the database
connection.connect(function (error) {
    if (error) throw error;
    console.log("Connected!");
});

//Loading my controller to respond to request
const Controller = new require('./Controller.js')(connection);

//adding the middleware which will get the body of the request
app.use(
    async function (req, res, next) {
        await bodyCatcher(req, res);
        next();
    }
);

//creating the route to get a token from an username and a password
app.get('/getToken', async (req, res) => {
    let body = {
        username : req.body.username,
        password : hasher.createHash('sha512').update(req.body.password, 'utf-8').digest('hex'),
    };
    //verifying username and password
    if((await executeQuery('SELECT * FROM accessList WHERE username = ? AND password = ?',[body.username,body.password])).length>0){
        //create a token
        let privateKey = fs.readFileSync('./private.pem', 'utf8');
        let token = jwt.sign({},privateKey, { algorithm: 'HS256'});
        //send the token
        res.send(token);
    }else{
        res.send({'status':'failed'});
    }
});


//creating the middleware that verify the token
function isAuthenticated(req, res, next) {
    if (typeof req.headers.authorization !== "undefined") {
        let token = req.headers.authorization;
        let privateKey = fs.readFileSync('./private.pem', 'utf8');
        jwt.verify(token, privateKey, { algorithm: "HS256" }, (err, user) => {
            if (err) {
                res.status(500).json({ error: "Not Authorized" });
            }
            return next();
        });
    } else {
        res.status(500).json({ error: "Not Authorized (no keys)" });
    }
}

//creating all routes with the "isAuthenticated" middleware
app.get('/campus',isAuthenticated, (req, res) => Controller.campusIndex(req, res));
app.get('/users',isAuthenticated, (req, res) => Controller.index(req, res));
app.post('/users',isAuthenticated, (req, res) => Controller.store(req, res));
app.get('/users/:id',isAuthenticated, (req, res) => Controller.show(req, res));
app.put('/users/:id',isAuthenticated, (req, res) => Controller.update(req, res));
app.patch('/users/:id',isAuthenticated, (req, res) => Controller.update(req, res));
app.delete('/users/:id',isAuthenticated, (req, res) => Controller.destroy(req, res));

//launch the server
app.listen(SERVER_PORT, SERVER_HOST, () => {
    console.log(`Server running at http://${SERVER_HOST}:${SERVER_PORT}/`);
});