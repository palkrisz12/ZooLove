const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');

const app = express();

// Use body-parser middleware to parse form data
app.use(bodyParser.urlencoded({ extended: true }));

// Handle form submission
app.post('/submit', (req, res) => {
    const data = {
        name: req.body.fnev,
        email: req.body.imell,
        password : req.body.psw,
    };

    // Read existing data from file, if it exists
    let existingData = [];
    try {
        existingData = JSON.parse(fs.readFileSync('data.json'));
    } catch (error) {
        console.error(error);
    }

    // Add new data to existing data array
    existingData.push(data);

    // Write data back to file
    fs.writeFileSync('data.json', JSON.stringify(existingData));

    res.send('Data submitted successfully');
});

// Start server
app.listen(3000, () => {
    console.log('Server listening on port 3000');
});