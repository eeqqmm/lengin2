const path = require('path');
const webpack = require ('webpack');

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
module.exports = {
    entry: ['./src/app.js'],

    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js'
    },
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        }
    },
    module: {
        rules: [
        //     {
        //     test:/\.(s*)css$/,
        //
        //     loader: MiniCssExtractPlugin.extract(['css-loader', 'sass-loader'])
        // },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts/'
                        }
                    }
                ]
            },
            {

            test: /\.(css|scss)$/,

            use: [
            {loader:MiniCssExtractPlugin.loader},

            { loader: "css-loader" },
            { loader: "sass-loader" },
            // {
            //         loader: 'postcss-loader',
            //         options: {
            //             postcssOptions: {
            //                 plugins: function () {
            //                     return [
            //                         require('autoprefixer')
            //                     ];
            //                 }
            //             }
            //         }
            // },
            ],
        },

        {
                test: /\.js$/,
                use: 'babel-loader'
        },
            {
                // Exposes jQuery for use outside Webpack build
                test: require.resolve('jquery'),
                use: [{
                    loader: 'expose-loader',
                    options: 'jQuery'
                },{
                    loader: 'expose-loader',
                    options: '$'
                }]
            },


               ]
    },
    plugins: [
        // new miniCss({
        //     filename: 'style.css',
        // }),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery"
        }),
        new MiniCssExtractPlugin({
            filename: 'main.css'
        })

    ],
    mode: "production",
    // mode: "development",
};