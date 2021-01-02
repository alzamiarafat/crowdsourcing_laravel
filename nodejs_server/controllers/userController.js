const express = require('express');
const userModel = require.main.require('./models/userModel');
const router = express.Router();

router.get('/admin/:id', (req, res) => {

  // res.send(req.params.id);
  userModel.get_activity(req.params.id, (result) => {
    res.send(result);
  });
});

module.exports = router;
