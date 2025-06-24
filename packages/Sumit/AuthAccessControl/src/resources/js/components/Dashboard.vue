<template>
  <div class="container mt-4">
    <h2>User Dashboard</h2>
    <p v-if="user">Welcome, {{ user.name }}!</p>
    <p v-else>Loading user data...</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: null
    };
  },
  mounted() {
    axios.get('/api/user')
      .then(response => {
        this.user = response.data;
      })
      .catch(() => {
        this.user = null;
      });
  }
}
</script>
