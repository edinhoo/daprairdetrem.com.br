module.exports = function(grunt) 
{
    var watchFiles = {
        
    },
    imageMin = {
        
    },
    cssMin = {
        
    },
    concat = {
        
    };
    
    
    grunt.initConfig({
        watch: watchFiles
    });
    
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-svgmin');
    grunt.loadNpmTasks('grunt-usemin');
    
    grunt.registerTask('default', ['']);
};