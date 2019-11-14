const SERVER_HOST = '127.0.0.1';
const SERVER_PORT = 8080;

const DATABASE_HOST = '127.0.0.1';
const DATABASE_NAME = 'projetwebcentral';
const DATABASE_PORT = 3306;
const DATABASE_USER = 'root';
const DATABASE_PASSWORD = '';


const app = require('express')();
const mysql = require('mysql');
const bodyCatcher = require('./bodyCatcher.js');
const jwt = require('jsonwebtoken');
const fs = require('fs');


const connection = mysql.createConnection({
    database: DATABASE_NAME,
    host: DATABASE_HOST,
    port: DATABASE_PORT,
    user: DATABASE_USER,
    password: DATABASE_PASSWORD,
});


connection.connect(function (error) {
    if (error) throw error;
    console.log("Connected!");
});

const Controller = new require('./Controller.js')(connection);



// const bodyParser = require('body-parser')

app.use(
    async function (req, res, next) {
        await bodyCatcher(req, res);
        next();
    }
);
//app.use(require('body-parser').json());
app.get('/getToken', (req, res) => {
    let privateKey = fs.readFileSync('./private.pem', 'utf8');
    let token = jwt.sign({},privateKey, { algorithm: 'HS256'});
    res.send(token);
});

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

//app.use(isAuthenticated());





app.get('/campus',isAuthenticated, (req, res) => Controller.campusIndex(req, res));
app.get('/users',isAuthenticated, (req, res) => Controller.index(req, res));
app.post('/users',isAuthenticated, (req, res) => Controller.store(req, res));
app.get('/users/:id',isAuthenticated, (req, res) => Controller.show(req, res));
app.put('/users/:id',isAuthenticated, (req, res) => Controller.update(req, res));
app.patch('/users/:id',isAuthenticated, (req, res) => Controller.update(req, res));
app.delete('/users/:id',isAuthenticated, (req, res) => Controller.destroy(req, res));


// app.use(bodyParser.json());

// app.use(function (err, req, res, next) {
//   console.error(err.stack);
//   res.send({status:'failed',error:'Something broke!'});
// });

app.listen(SERVER_PORT, SERVER_HOST, () => {
    console.log(`Server running at http://${SERVER_HOST}:${SERVER_PORT}/`);
});