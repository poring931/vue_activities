module.exports = {
    'env': {
        'browser': true,
        es2021: true
    },
    parser: '@typescript-eslint/parser',
    extends: [
        // By extending from a plugin config, we can get recommended rules without having to add them manually.
        'eslint:recommended',
        'plugin:import/recommended',
        'plugin:@typescript-eslint/recommended',
        // This disables the formatting rules in ESLint that Prettier is going to be responsible for handling.
        // Make sure it's always the last config, so it gets the chance to override other configs.
        'eslint-config-prettier',
    ],

    'plugins': [ '@typescript-eslint'],
    'rules': {
        indent: ['error', 4], // Отступы в 4 пробела
        'linebreak-style': 0,
        'import/no-unresolved': 'off',
        'import/extensions': 'off',
        'import/prefer-default-export': 'off',
        'no-ndef': 'off',
        'no-param-reassign': 'off',
        'spaced-comment': ['error', 'always', { markers: ['/'] }],
        'array-bracket-spacing': ['error', 'never'],
        'brace-style': ['error', '1tbs'],
        'nonblock-statement-body-position': ['error', 'any'],
        'newline-per-chained-call': ['error', { ignoreChainWithDepth: 2 }],
        'padded-blocks': ['error', 'never'],
        'space-in-parens': ['error', 'never'],
        'no-multiple-empty-lines': ['error', {
            max: 1,
            maxEOF: 1
        }],
        'no-whitespace-before-property': 'error',
        'computed-property-spacing': ['error', 'never'],
        'key-spacing': ['error', {
            beforeColon: false,
            afterColon: true
        }],
        'block-spacing': ['error', 'always'],
        'object-curly-spacing': ['error', 'always'],
        'comma-spacing': ['error', {
            before: false,
            after: true
        }],
        'i18next/no-literal-string': ['error', {
            markupOnly: true,
            ingoreAttribute: ['data-testid', 'to']
        }],
        quotes: ['error', 'single'], // Одинарные кавычки для строк
        semi: ['error', 'always'], // Всегда ставим точку с запятой
        'newline-after-var': ['error', 'always'], // Всегда переносим строку после разных сигнатур
        'padding-line-between-statements': ['error', {
            blankLine: 'always',
            prev: '*',
            next: ['if', 'function', 'class']
        }] // Двойной перенос строки после блоков кода
    },
    ignorePatterns: ['auto-imports.d.ts'],
    globals: {
        __IS_DEV__: true,
        __API__: true,
        __PROJECT__: true
    },
    overrides: [{
        files: ['**/src/**/*.test.{ts}'],
        rules: {
            'i18next/no-literal-string': 'off',
        },
    },],
};
