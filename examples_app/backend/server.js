const mongoose = require("mongoose");
const express = require("express");
const bodyParser = require("body-parser");
const logger = require("morgan");
const Examples = require("./data");

const API_PORT = 3001;
const app = express();
const router = express.Router();

// this is our MongoDB database
const dbRoute = "mongodb://AdminTim:sup3rst4rcu5t@localhost:27017/tjswancouk?authSource=admin";

// connects our back end code with the database
mongoose.connect(
  dbRoute,
  { useNewUrlParser: true }
);

let db = mongoose.connection;

db.once("open", () => console.log("connected to the database"));

// checks if connection with the database is successful
db.on("error", console.error.bind(console, "MongoDB connection error:"));

// (optional) only made for logging and
// bodyParser, parses the request body to be a readable json format
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(logger("dev"));

app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  res.header("Access-Control-Allow-Methods", "GET, PUT, POST, DELETE");
  next();
});

// this is our get method
// this method fetches all available data in our database
router.get("/getData", (req, res) => {
  Examples.find((err, data) => {
    if (err) return res.json({ success: false, error: err });
    //return res.json();
    return res.json({ success: true, data: data });
  });
});

// this is our update method
// this method overwrites existing data in our database
router.post("/updateData", (req, res) => {
  const { id, update } = req.body;

  const objIdToUpdate = new mongoose.Types.ObjectId(id);

  Examples.findOneAndUpdate({_id:objIdToUpdate}, update, err => {
    if (err) return res.json({ success: false, error: err });
    return res.json({ success: true });
  });
});

// this is our delete method
// this method removes existing data in our database
router.delete("/deleteData", (req, res) => {
  const { id } = req.body;

  //console.log("Deleting id: " + id);

  const objIdToDelete = new mongoose.Types.ObjectId(id);
  
  Examples.deleteOne({_id:objIdToDelete} , err => {
    if (err) return res.send(err);
    return res.json({ success: true });
  });
});

// this is our create methid
// this method adds new data in our database
router.post("/putData", (req, res) => {
  let example = new Examples();

  const requestData = req.body;

  /*if ((!id && id !== 0) || !message) {
    return res.json({
      success: false,
      error: "INVALID INPUTS"
    });
  }*/
  example.numericalIndex = requestData.numericalIndex;
  example.title = requestData.title;
  example.imageFileName = requestData.imageFileName;
  example.url = requestData.url;
  example.link = requestData.link;
  example.description = requestData.description;
  example.save(err => {
    if (err) return res.json({ success: false, error: err });
    return res.json({ success: true });
  });
});

// append /api for our http requests
app.use("/api", router);

// launch our backend into a port
app.listen(API_PORT, () => console.log(`LISTENING ON PORT ${API_PORT}`));