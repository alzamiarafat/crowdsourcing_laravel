const express = require('express');
const bodyParser 		= require('body-parser');

const app = express();
const port = 8080;

const activity = require('./controllers/userController');

app.use(bodyParser.urlencoded({extended: true}));

app.use('/get_activity', activity);

app.get('/', (req, res) => {
	res.send('Welcome');
})

app.get('/check', (req, res) => {
	res.json({
		'Name' : 'Aminul Islam Saqib',
		'ID' : '17-34879-2'
	});
});

/*app.get('/search', (req, res) => {
	res.json({
		'Data' : 'Data send from guzzleHttp'
	});
});*/

app.listen(port, (error) => {
	console.log('Server started at '+port);
});
