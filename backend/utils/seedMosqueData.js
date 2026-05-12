const dotenv = require("dotenv");
const Mosque = require("../models/Mosque");
const connectDB = require("../config/db");

const provincesData = require("./provincesData");
const generateMosqueCode = require("./generateMosqueCode");

dotenv.config();
connectDB();

const seedMosques = async () => {
  try {
    await Mosque.deleteMany();

    let mosqueData = [];

    for (const province in provincesData) {
      const cities = provincesData[province];

      cities.forEach((city) => {
        mosqueData.push({
          mosqueCode: generateMosqueCode(city),
          mosqueName: `Masjid Agung ${city}`,
          province: province,
          city: city,
          address: `Jl. Raya ${city}, ${province}`,
          images: [
            "mosque1.jpg",
            "mosque2.jpg",
            "mosque3.jpg"
          ],
          donationTarget:
            Math.floor(Math.random() * 100000000) + 50000000,
          collectedAmount:
            Math.floor(Math.random() * 30000000),
          description:
            `Program renovasi Masjid Agung ${city}`
        });
      });
    }

    await Mosque.insertMany(mosqueData);

    console.log(
      `${mosqueData.length} data masjid berhasil ditambahkan`
    );

    process.exit();
  } catch (error) {
    console.log(error);
    process.exit(1);
  }
};

seedMosques();