var fs = require("fs");
console.log("starting");
fs.writeFileSync("./files/write_sync.txt", "Hellp world! Synchronus");
console.log("Finished"); 