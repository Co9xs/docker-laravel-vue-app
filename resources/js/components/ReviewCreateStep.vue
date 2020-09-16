<template>
    <div class="tl">
        <div class="tl-content main-bdr">
            <div class="tl_label">STEP.1</div>
            <div class="tl_title">会社を検索</div>
            <div class="tl_main">
                検索バーから口コミを書きたい会社名を検索。正式名称で検索すると見つけやすくなります。
            </div>
            <div class="tl_marker main-bdr main-bc"></div>
        </div>
        <div class="tl-content main-bdr">
            <div class="tl_label">STEP.2</div>
            <div class="tl_title">会社を選択</div>
            <div class="tl_main">
                口コミを投稿したい会社をクリック。同名の会社がある時は、正しい所在地を確認しましょう。
            </div>
            <div class="tl_marker main-bdr main-bc"></div>
        </div>
        <div class="tl-content main-bdr">
            <div class="tl_label">STEP.3</div>
            <div class="tl_title">口コミを投稿</div>
            <div class="tl_main">
                <p>
                    画面の指示に従って口コミを投稿。公序良俗に反する内容などは書かないようにして下さい。
                </p>
            </div>
            <div class="tl_marker main-bdr main-bc"></div>
        </div>
        <div class="tl-content main-bdr">
            <div class="tl_title">投稿完了！</div>
            <div class="tl_marker main-bdr main-bc"></div>
        </div>
    </div>
</template>

<style>
.tl {
    background-color: #fff;
    border-radius: 5px;
    padding: 8px;
}

.main-bdr {
    border-color: #6bb6ff;
}

.tl-content {
    position: relative;
    padding: 0 0 1.5em 1.8em;
}

.tl-content:before {
    content: "";
    display: block;
    position: absolute;
    top: 24px;
    bottom: 0;
    left: 6px;
    width: 3px;
    background: #ccd5db;
}

.tl-content:not(:first-of-type):not(:last-of-type) .tl_marker {
    background: transparent;
}

.tl-content:last-of-type:before {
    content: none;
}

.tl-content img {
    max-width: 100%;
    height: auto;
}

.tl_label {
    padding-top: 2px;
    color: #333;
    font-size: 14px;
    font-weight: bold;
}

.tl_title {
    font-size: 1.1em;
    font-weight: bold;
    line-height: 1.5;
}

.tl_main {
    margin-top: 0.5em;
    padding: 0 0 1.5em;
    font-size: 0.9em;
    line-height: 1.6;
    border-bottom: dashed 1px #ccd5da;
}

.main-bc {
    background-color: #6bb6ff;
}

.tl_marker {
    content: "";
    display: block;
    position: absolute;
    top: 6px;
    left: 0;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: solid 3px #6bb6ff;
}
</style>
