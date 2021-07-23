const express = require('express');
var mysql = require('mysql');
const getRoute = express.Router();

var connection = require('../dbconnect');

getRoute.get('/', async (req,res) => {
    await connection.query("SELECT * FROM aluno", (err, result) => {
        if (err) throw err;
        console.log(result);
        res.json(result);
    });
});

module.exports = getRoute;