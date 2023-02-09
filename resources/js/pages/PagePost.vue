<template>
    <div>
        <h1>Show del post</h1>
        <p>
        Lo slug del posts e': {{ slug }}
        </p>
    </div>
</template>

<script>
export default {
    props: [
        'slug',
    ]
}
</script>

<style>
</style>
