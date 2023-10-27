const puppeteer = require('puppeteer');
const url = 'http://127.0.0.1:8000/en/landing_page/theme1';

(async () => {
    const browser = await puppeteer.launch({
        headless: true,
    });
    const page = await browser.newPage();

    await page.goto(url);
    
    const sanitizedUrl = url.replace(/[^a-zA-Z0-9]/g, '-');
    const screenshotPath = '../../public/screenshots/' + sanitizedUrl + '.png';

    await page.screenshot({ path: screenshotPath });
     
    browser.disconnect();
})();
