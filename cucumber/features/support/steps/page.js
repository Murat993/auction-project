const { When, Then } = require('@cucumber/cucumber')
const { expect } = require('chai')

When('I open {string} page', { wrapperOptions: { retry: 2 }, timeout: 30000 }, async function (uri) {
    return await this.page.goto('http://gateway:8080' + uri)
})

Then('I see {string}', async function (value) {
    await this.page.waitForFunction(
      (text) => document.querySelector('body').innerText.includes(text),
      {},
      value
    )
})

Then('I do not see {string}', async function (value) {
    const content = await this.page.content()
    expect(content).to.not.include(value)
})

Then('I see {string} element', async function (id) {
  await this.page.waitForSelector('[data-testid=' + id + ']')
})

Then('I see {string} header', async function (value) {
  await this.page.waitForFunction(
    (text) => {
      const el = document.querySelector('h1')
      return el ? el.innerText.includes(text) : false
    },
    {},
    value
  )
})
