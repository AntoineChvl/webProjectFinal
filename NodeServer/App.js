


const SERVER_HOST = '127.0.0.1';
const SERVER_PORT = 8080;

const DATABASE_HOST = '127.0.0.1';
const DATABASE_NAME = 'projetwebcentral';
const DATABASE_PORT = 3306;
const DATABASE_USER = 'root';
const DATABASE_PASSWORD = '';



var app = require('express')();
var mysql = require('mysql');
var userController = require('./UserController.js');
var bodyCatcher = require('./bodyCatcher.js');



var connection = mysql.createConnection({
	database: DATABASE_NAME,
	host: DATABASE_HOST,
	port: DATABASE_PORT,
	user: DATABASE_USER,
	password: DATABASE_PASSWORD,
});



connection.connect(function(error) {
	if (error) throw error;
	console.log("Connected!");
});

userController.connection = connection;

app.get('/users',(req, res)=>
	bodyCatcher(req,res,(req, res,body)=>
		userController.index(req, res,body)));
app.post('/users',(req, res)=>
	bodyCatcher(req,res,(req, res,body)=>
		userController.store(req, res)));
app.get('/users/:id',(req, res)=>
	bodyCatcher(req,res,(req, res,body)=>
		userController.show(req, res)));
app.put('/users/:id',(req, res)=>
	bodyCatcher(req,res,(req, res,body)=>
		userController.update(req, res)));
app.patch('/users/:id',(req, res)=>
	bodyCatcher(req,res,(req, res,body)=>
		userController.update(req, res)));
app.delete('/users/:id',(req, res)=>
	bodyCatcher(req,res,(req, res,body)=>
		userController.destroy(req, res)));

// const bodyParser = require('body-parser')

// app.use(
//   bodyParser.urlencoded({
//     extended: true
//   })
// );

// app.use(bodyParser.json());

// app.use(function (err, req, res, next) {
//   console.error(err.stack);
//   res.send({status:'failed',error:'Something broke!'});
// });

app.listen(SERVER_PORT, SERVER_HOST, () => {
	console.log(`Server running at http://${SERVER_HOST}:${SERVER_PORT}/`);
});