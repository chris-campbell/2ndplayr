module.exports = {
    // Runs ESLint on TypeScript and JavaScript files
    '**/*.{js,ts}': function(files) {
        const filePaths = files.map((file) => `"${file}"`).join(' ');
        return `eslint --fix ${filePaths}`;
    },
    // Runs Stylelint on CSS files
    '**/*.css': function(files) {
        const filePaths = files.map((file) => `"${file}"`).join(' ');
        return `stylelint --fix ${filePaths}`;
    },
    // Runs Prettier on JSON files
    '**/*.{ts,js,json}': function(files) {
        const filePaths = files.map((file) => `"${file}"`).join(' ');
        return `prettier --write ${filePaths}`;
    },
};
