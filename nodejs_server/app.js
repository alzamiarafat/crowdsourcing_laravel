const express = require('express');

const app = express();
const port = 8080;

app.get('/', (req, res) => {
	res.send('Welcome');
})


app.listen(port, (error) => {
	console.log('Server started at '+port);
});