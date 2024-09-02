module.exports = {
    extends: [
        'airbnb-typescript/base',
        'plugin:@typescript-eslint/recommended'
    ],
    parser: '@typescript-eslint/parser',
    parserOptions: {
        ecmaVersion: 'latest',
        sourceType: 'module',
        project: './tsconfig.json', // Path to your tsconfig.json file

    },
    overrides: [
        {
            files: ['.eslintrc.js'],
            rules: {
                'global-require': 'off',
            },
        },
    ],
    plugins: [
        '@typescript-eslint',
        'import',
        'local',
    ],
    rules: {
        'object-shorthand': 'off',
        'func-names': ['error', 'never'],  // Set to 'error' and 'never'
        indent: ['error', 4],
        '@typescript-eslint/indent': ['error', 4],
        'max-lines-per-function': ['error', 50],
        'max-statements': ['warn', 10],
        'no-restricted-syntax': [
            'warn',
            {
                selector: 'ArrowFunctionExpression',
                message: 'Arrow functions should be avoided.',
            },
        ],
        'local/no-non-data-attributes': 'error',
    },
};
