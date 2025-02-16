<template>
    <div class="block">
        <div class="block__wrapper">
            <PerfectScrollbar class="block__scrollbar">
                <FormInput
                    name="name"
                    placeholder="Ваше имя"
                    v-model="form.name"
                    :value="form.name"
                />
                <FormInput
                    name="company"
                    placeholder="Название компании"
                    v-model="form.company"
                    :value="form.company"
                />
                <FormInput
                    name="phone"
                    placeholder="Телефон"
                    v-model="form.phone"
                    :value="form.phone"
                />
                <FormInput
                    name="phone"
                    placeholder="Почта"
                    v-model="form.email"
                    :value="form.email"
                />
                <FormInput
                    name="comment"
                    placeholder="Расскажите кратко о задаче"
                    v-model="form.comment"
                    :value="form.comment"
                />
                <FormFile
                    name="file"
                    label="Прикрепите файл"
                    v-model="form.file"
                    :value="form.file"
                />
            </PerfectScrollbar>
        </div>
    </div>
</template>
  
<script setup lang="ts">

const form = ref({
  company: '',
  name: '',
  email: '',
  phone: '',
  comment: '',
  file: '',
});

</script>
  
<style scoped lang="scss">
.block {
    width: 50%;
    background: var(--fg-blue);
    padding: 4rem;

    &__wrapper {
        background: var(--fg-white);
        padding: 3rem 2rem;
        height: 100%;
        max-height: 485px;
        overflow: hidden;
    }

    &__scrollbar{
        max-height: 485px;
        padding: 0 2rem;
    }
}

:deep(.ps__rail-y){
  width: 1.5px;
  background: var(--fg-gray);
  opacity: 1 !important;
  right: 1rem;
  max-height: 40.5rem !important;
}

:deep(.ps__thumb-y) {
  width: 1.5px !important;
  background: var(--fg-blue) !important;
  right: 0 !important;
}
</style>