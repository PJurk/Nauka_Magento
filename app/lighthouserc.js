module.exports = {
    ci: {
      upload: {
        target: 'lhci',
        token: '4f2df83c-7429-4e00-92b9-1168308370bd',
        serverBaseUrl: 'http://magento.test.com:9001',
        headful: false
      },
      collect: {
          additive: false,
          url: [
              'http://magento.test.com/',
              'http://magento.test.com/index.php/women'
          ],
          numberOfRuns: 5
      },
    //   assert: {
    //       preset: "lighthouse:recommended",
    //       includePassedAssertions: true
    //   } 
    },
  };