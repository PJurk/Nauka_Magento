module.exports = {
    ci: {
      upload: {
        target: 'lhci',
        token: 'e564e882-f2e9-42e4-bf56-00b52dce59c1',
        serverBaseUrl: 'localhost:9001',
        headful: false
      },
      collect: {
          additive: false,
          url: [
              'localhost',
              'localhost/index.php/women'
          ],
          numberOfRuns: 3,
          startServerCommand: 'docker-compose up -d --build',
      },
    //   assert: {
    //       preset: "lighthouse:recommended",
    //       includePassedAssertions: true
    //   } 
    },
  };