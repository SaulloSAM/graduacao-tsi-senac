/* ========================================================================= */
/* Adiciona os módulos instalados                                            */
/* ========================================================================= */
const gulp = require('gulp');                           /* Gerencia um Servidor para teste em Desenvolvimento   */
const browserSync = require('browser-sync').create();   /* Gerencia o browser [atualização, inicialização]      */

/* Variáveis */
const proxyXampp = "http://localhost/projetos/Projeto-integrador-5/deploy";
const portXampp = 8080;

/* ========================================================================= */
/* Funções                                                                   */
/* ========================================================================= */

/**
 * Concexão com o XAMPP.
 */
function browser () {
    browserSync.init({
        proxy: proxyXampp,
        port: portXampp
    });
}

/**
 * Essa função fica verificando se houve alguma alteração em qualquer arquivo [Indicado]
 * foi alterado e executa uma determinada função para tal arquivo.
 * ex: ao modificar um js/app, o sistema automaticamente compila esse novo arquivo e substitui pelo anterior.
 */
function watch () {
    gulp.watch('deploy/**/**/*.js').on('change', browserSync.reload)
    gulp.watch('deploy/**/**/*.css').on('change', browserSync.reload)
    gulp.watch('deploy/**/*.php').on('change', browserSync.reload)
}

/* ========================================================================= */
/* Tarefas                                                                   */
/* ========================================================================= */
gulp.task('browser-sync', browser);
gulp.task('watch', watch);

/* Defualt */
gulp.task('default', gulp.parallel('watch', 'browser-sync'));