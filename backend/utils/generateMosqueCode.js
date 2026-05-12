function generateMosqueCode(city) {
  const cityCode = city
    .replace(/\s/g, "")
    .substring(0, 3)
    .toUpperCase();

  const randomNumber = Math.floor(Math.random() * 999) + 1;

  return `${cityCode}/2026/${String(randomNumber).padStart(3, "0")}`;
}

module.exports = generateMosqueCode;