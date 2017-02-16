<template>


    <table>

    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <tr v-for="article in articles">
            <td>{{ article.title }}</td>

        </tr>
    </tbody>


    </table>

</template>



<script>

</script>
