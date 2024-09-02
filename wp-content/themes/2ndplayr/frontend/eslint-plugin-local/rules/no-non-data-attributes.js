module.exports = {
    meta: {
        type: 'suggestion',
        docs: {
            description:
                'enforce the use of data-* attributes for targeting elements',
            category: 'Best Practices',
            recommended: false,
        },
        schema: [], // no options
    },
    create(context) {
        return {
            CallExpression: function (node) {
                const { callee } = node;
                if (
                    callee.type === 'MemberExpression'
                    && callee.property.type === 'Identifier'
                ) {
                    const method = callee.property.name;
                    if (
                        method === 'getElementById'
                        || method === 'getElementsByClassName'
                    ) {
                        context.report({
                            node,
                            message: `Use document.querySelector or document.querySelectorAll with data-* attributes instead of ${method}`,
                        });
                    }
                } else if (callee.type === 'Identifier') {
                    if (
                        callee.name === 'querySelector'
                        || callee.name === 'querySelectorAll'
                    ) {
                        const arg = node.arguments[0];
                        if (
                            arg
                            && arg.type === 'Literal'
                            && (arg.value.includes('#') || arg.value.includes('.'))
                        ) {
                            context.report({
                                node: arg,
                                message:
                                    'Use data-* attributes instead of class or id selectors',
                            });
                        }
                    }
                }
            },
        };
    },
};
