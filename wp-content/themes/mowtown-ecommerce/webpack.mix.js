/**
 * @date 1/21/2021
 * @author Greg
 * Build created with Node 12.14.0
 * Laravel Mix v6.0.10
 * Will have problems >= Node 14+, >= Bootstrap 5
 *
 */

const mix = require('laravel-mix');
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
require('laravel-mix-postcss-config');
mix
   // .disableNotifications()
    .js('assets/scripts/main.js', 'dist/js/main.js')
    // Run Sass on site build files and output to untracked location in assets directory
    .sass('assets/styles/main.scss', 'assets/build/main.css')
    .options({
        processCssUrls: false,
        //terser: {},
        purifyCss: false,
        // purifyCss: {},
        postCss: [require('autoprefixer')],
        clearConsole: false,
        cssNano: {
            // discardComments: {removeAll: true},
        }
    })
    // Run PostCss on computed Sass file and outputs to project directory
    .postCss('assets/build/main.css', 'dist/css/app.css', [
        // This plugin only processes variables that are defined in the :root selector.
        // For options see: https://www.npmjs.com/package/postcss-custom-properties
        require('postcss-custom-properties'),
        require('postcss-sorting')({
            'properties-order': 'alphabetical'
        }),
        require('postcss-url')({
            // Seeking options that work with Mix
        }),
        require('cssnano')
    ])

    .copyDirectory(
        'assets/images', 'dist/images/'
    )
    // // .copyDirectory(
    // //   'assets/fonts', 'dist/fonts/'
    // // )
    //
    .browserSync({proxy: 'http://localhost:10023/'})
    .webpackConfig({
            plugins: [
                new CleanWebpackPlugin({
                    // Simulate the removal of files
                    // default: false
                    dry: false,

                    // Write Logs to Console
                    // (Always enabled when dry is true)
                    // default: false
                    verbose: false,

                    // Automatically remove all unused webpack assets on rebuild
                    // default: true
                    cleanStaleWebpackAssets: true,

                    // Do not allow removal of current webpack assets
                    // default: true
                    protectWebpackAssets: true,
                    cleanOnceBeforeBuildPatterns: ['dist/*', '!static-files*'],
                })
            ]
        }
    );
