const db = require('./db');

module.exports = {
  getData: (id, callback) => {
    var sql = `select * from user where id = ${id}`;

    db.getResults(sql, (result) => {
      callback(result);
    });
  },

  get_activity: (admin_id, callback) => {
    var sql = `select * from admins_history where admin_id = ${ admin_id }`;

    db.getResults(sql, (result) => {
      callback(result);
    });
  }
}
