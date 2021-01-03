const express = require('express');
const userModel = require.main.require('./models/userModel');
const router = express.Router();

router.get('/admin/:id', (req, res) => {

  // res.send(req.params.id);
  userModel.get_activity(req.params.id, (result) => {
    res.send(result);
  });
});

router.get('/search', (req, res)=>{
  res.render('user/search');
});

router.post('/search', (req, res) => {
  var search = { search: req.body.search};

    userModel.search(search, (result) => {
        console.log(result);
        /*res.json({
            results: result
        });*/
    });
});


module.exports = router;
