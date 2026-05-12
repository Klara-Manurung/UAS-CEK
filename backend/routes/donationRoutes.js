const router = require("express").Router();
const {createDonation} = require("../controllers/donationController");

router.post("/",createDonation);

module.exports = router;