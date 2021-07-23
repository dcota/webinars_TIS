const express = require('express');
var mysql = require('mysql');
const postRoute = express.Router();

var con = require('../dbconnect');

postRoute.post('/', async (request,response) => {
    await con.query("INSERT INTO aluno (primnome,ultnome,morada,datanascimento,telemovel,genero) VALUES (?,?,?,?,?,?)",
    [request.body.pn, request.body.un, request.body.mor, request.body.dn, request.body.tel, request.body.gen], (err, result) => {
        if (err) throw err;
        console.log(result);
        response.json(result);
    });
});

module.exports = postRoute;