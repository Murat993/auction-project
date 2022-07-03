const { Given, When, Then } = require('cucumber');

Given('I am a guest user', function () {});

When('I open home page', async function () {
    this.page = await this.browser.newPage()
})

Then('I see welcome block', function () {
    return 'pending';
});