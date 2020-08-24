<template>
  <p>CompanyList</p>
</template>

<script>
export default {
  mounted() {
    axios.get('https://api.houjin-bangou.nta.go.jp/4/num?id=KGpBHpB6erjnk&number=8040001999013&type=01&history=0')
    .then((res) => {
      console.log(res.data)
    })
  }
}
</script>

<style>

</style>