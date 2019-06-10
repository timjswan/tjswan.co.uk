// /backend/data.js
const mongoose = require("mongoose");
const Schema = mongoose.Schema;

// this will be our data base's data structure 
const ExamplesSchema = new Schema(
  {
    title: String,
    imageFileName: String,
    url: String,
    link: String,
    description: String,
    numericalIndex: Number
  }
);

// export the new Schema so we could modify it using Node.js
module.exports = mongoose.model("Examples", ExamplesSchema);