const express = require('express');
const app = express();
const path = require('path');

app.use(express.urlencoded({ extended: true }));
app.use(express.json({ extended: false }));

//define os caminhos possíveis
app.use("/bd",require("./routes/getRoute"));
app.use("/insert",require("./routes/postRoute"));

//define pasta publica
app.use(express.static('./public'));

//servir página inicial
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '/public/index.html'));
});

const PORT = 3000;

app.listen(PORT, () => console.log('Listening on port ' + PORT));