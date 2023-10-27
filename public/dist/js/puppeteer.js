const puppeteer = require('puppeteer');
const url = process.argv[2];
console.log('puppeteer',url);
(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    await page.goto(url);
    await page.screenshot({ path: `public/screenshots/${url.replace(/[^a-zA-Z0-9]/g, '-')}.png` });

    await browser.close();
})();
