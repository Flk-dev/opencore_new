<template>
  <div class="form__row form__file">
    <input type="file" class="form__file-input" :name="name" >
    <label :for="name" class="form__file-label">
      <span class="form__file-title">{{label}}</span>
      <span class="form__file-icon">
        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.0756 7.22747V17.1051V20.4298V21.2781L14.0378 22.1401M9.31836 23.4963V7.22747L11.5 5.00208M12.8877 3.6581L13.038 3.50781L13.1883 3.6581M12.8877 3.6581C12.9378 3.60801 13.1883 3.6581 13.1883 3.6581M12.8877 3.6581L11.5 5.00208M13.1883 3.6581L14.5 5.00208M11.5 5.00208C12.1939 4.33009 13.8442 4.33009 14.5 5.00208M14.5 5.00208L16.7577 7.22747V20.4298V21.2781L15.8788 22.1401M14.0378 22.1401L15 23.0021L15.8788 22.1401M14.0378 22.1401H15.8788M13.0756 19.0021V21.1818L13.1353 21.2599C14.0575 22.4677 15.8884 22.4282 16.7577 21.1818V21.1818V19.1037" stroke="#111111" stroke-opacity="0.5" stroke-width="1.5"/>
        </svg>
      </span>
    </label>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  name: string,
  label: string,
}>();
</script>

<style scoped lang="scss">
.form__file {
  position: relative;
}

.form__file-input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  opacity: 0;
  margin: 0;
}

.form__file-label {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 2.415rem 2rem 1.415rem;
  border-bottom: .15rem solid var(--fg-black);

  @media (max-width: $mobile) {
    padding: 2.5rem 1rem 1.5rem;
  }
}

.form__file-title {
  font-size: 2.2rem;
  line-break: 120%;
  color: var(--fg-black-50);
  
  @media (max-width: $mobile) {
    font-size: 1.5rem;
  }
}
</style>