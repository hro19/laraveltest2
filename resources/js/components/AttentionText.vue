<template>
    <div>
    <h2>注意事項</h2>
    <ol>
    	<li>app.jsにVue.componentを記述</li>
    	<li>resource/js/components/にファイルを作成</li>
    	<li>ファイルにテキスト入力</li>
    </ol>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('アテンションテキスト.')
        }
    }
</script>
