const Mosque = require("../models/Mosque");
const Donation = require("../models/Donation");

exports.dashboard = async(req,res)=>{
    const totalMosque = await Mosque.countDocuments();
    const totalDonation = await Donation.countDocuments();

    res.json({
        totalMosque,
        totalDonation
    });
};