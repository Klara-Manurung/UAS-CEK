const Donation = require("../models/Donation");
const Mosque = require("../models/Mosque");

exports.createDonation = async(req,res)=>{
    const donation = await Donation.create(req.body);

    await Mosque.findByIdAndUpdate(
        req.body.mosqueId,
        {
            $inc:{
                collectedAmount:req.body.amount
            }
        }
    );

    res.json(donation);
};