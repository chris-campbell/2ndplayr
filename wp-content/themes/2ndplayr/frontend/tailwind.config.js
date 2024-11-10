/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['../../2ndplayr/frontend/**/*.ts', '../../2ndplayr/**/*.php'],
    theme: {
        fontSize: {},
        extend: {
            width: {
                62: '15.5rem'
            },
            height: {
                62: '15.5rem'
            },
            boxShadow: {
                'img': '3px 3px 14px rgba(0, 0, 0, 0.1)',
              },
            fontFamily: {
                serif: ['noka', 'serif'],
                sans: ['futura-pt', 'sans-serif'],
            },
            fontSize: {
                // Large Headings
                '4xl': '3rem', // 48px, typically for main titles
                '3xl': '2.25rem', // 36px, for section headings
                '2xl': '1.6rem', // 30px, for sub-sections

                // Medium Headings
                xl: '1.5rem', // 24px, used for smaller sections
                lg: '1.25rem', // 20px, often used for important labels or introductory text

                // Small Headings
                md: '1rem', // 16px, suitable for navigational elements and smaller headings

                // Paragraph text
                base: '1rem', // 16px, default font size for body text
                'base-lg': '1.125rem', // 18px, slightly larger for enhanced readability
                sm: '0.975rem', // 14px, smaller text for captions or less important information
                xs: '0.875rem', // 14px, smallest text size for fine print or disclaimers
            },
            letterSpacing: {
                'tight-sm': '0.01em', // 0.16px
                'normal-md': '0.016em', // 0.26px
                'normal-lg': '0.02em', // 0.32px
                'wide-sm': '0.03em', // 0.48px
                'wide-md': '0.035em', // 0.56px
                'wide-lg': '0.039em', // 0.62px
                'wide-xl': '0.04em', // 0.64px
                'wider-sm': '0.06em', // 0.96px
                'widest-sm': '0.14em', // 1.92px
                'extra-wide': '0.16em', // 2.56px
            },
            lineHeight: {
                'dynamic': 'calc(1.5em + .2vw)',
            },
            aspectRatio: {
                '3/4': '3 / 4',
            },
            borderWidth: {},
            screens: {
                sm: '24rem', // 375px
                'sm-2': '34.438rem',
                md: '48rem', // 768px
                'md-2': '65.875rem',
                lg: '83rem', // 1330px
            },
            spacing: {},
            maxWidth: {
                452: '113rem',
                284: '71rem',
                212: '53.75rem',
                176: '44rem',
                101: '25.3rem',
                90: '23.563rem'
            },
            width: {
                '32-5': '8.125rem',
            },
            colors: {
                white: '#F2F2F2',
                night: '#23282F',
                midnight: '#1A1E24',
                sky: '#86A7DC',
                gloom: '#C6C6C9',
                storm: '#686A6F',
                ruby: '#D64343',
                rubydark: '#ac3636',
                subruby: '#8f2b2b'
            },
        },
    },
    safelist: [],
};
