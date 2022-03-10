<template>
    <div id="overlay">
        <div class="ls-success">
            <h2>Ordine effettuato</h2>
            <button>cio</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Success",
};
</script>

<style lang="scss" scoped>
#overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.466);
    z-index: 998;
    overflow: hidden;
}
.ls-success {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    min-height: 100px;
    min-width: 100px;
    background-color: white;
    z-index: 999;
}
</style>
