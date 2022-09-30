import Base from '../../module/Base.js'
import app from '../../module/App.js'

export default class App extends Base {
    constructor() {
        super()
        this.app = new app()

        this.dom = {};
        this._init();

    }

    _init() {

        if (document.querySelectorAll('.accordion_one .ac_header') != null) {
            this.dom.accordionHeaders = document.querySelectorAll('.accordion_one .ac_header');
            const accordionAction = (el) => {
                    const acInner = el.target.closest('.ac_header').nextElementSibling
                    if (acInner == null) throw new Error()
                    this.app.slideToggle(acInner)
            }
            try {
                [...this.dom.accordionHeaders].map((item) => {
                    this._addListener(item, 'click', accordionAction)
                })
            } catch (e) {
                throw new Error(e)
            }
        }
        this.paramGet();

        // $(function(){
        //   $('.accordion_one .ac_header').click(function(){
        //     $(this).next('.ac_inner').slideToggle();
        //     $(this).toggleClass("open");
        //   });
        // });
    }


    paramGet() {
        const button1 = document.getElementById('seach_btn');
        console.log('search:' + decodeURI(location.search));

        // キーワードを取得
        var str01 = decodeURI(location.search).substring(14);
        var keyWord = str01.split('&')[0];

        var trueTokage = 'とかげです';
        var notTokage = 'とかげではありません';

        // const elsQ = document.querySelectorAll('.p-faq__q-txt');
        // const elsA = document.querySelectorAll('.p-faq__a-txt answer');
        const elsO = document.querySelectorAll('.text-item');
        let parent = document.querySelector('.text-item').parentElement;

        //　カテゴリを判断するようのカウント
        var categoryCnt = 3;

        // 全部取り出し
        elsO.forEach((elementsO) => {

            // カテゴリを判定
            if(categoryCnt % 3 == 0) {

                // カテゴリの空白を抜く
                console.log(
                    'タイトルと内容:' + elementsO.textContent.substring(8)
                    );

                } else {
                // カテゴリ以外の処理
                console.log('タイトルと内容:' + elementsO.textContent);

                //keyWordが含まれるかどうかを判断する
                if (~elementsO.textContent.indexOf(keyWord)) {
                    console.log(trueTokage);

                    console.log('parentのclass名:' + parent.classList);

                    // let parent = elementsO.parentNode;
                    // console.log('親ノードの名前：' + parent.nodeName);
                    // parent = parent.parentNode;

                } else {
                    console.log(notTokage);
                }
            }

          // console.logU(categoryCnt + '番目のカテゴリ');
          categoryCnt++;
        });


        //console.log('keyWord:' + keyWord);

        // //keyWordが同じ文字かどうかを判断する
        // if (keyWord == 'とかげ') {
        //     console.log(trueTokage);
        // } else {
        //     console.log(notTokage);
        // }

        window.globalFunction = {};
        window.globalFunction.paramGet = paramGet;
        window.globalFunction.paramGet = paramGet;
    }
}
