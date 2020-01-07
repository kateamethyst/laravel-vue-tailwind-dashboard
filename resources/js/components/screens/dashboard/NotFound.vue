<template>
    <div>
        <div class="wrapper p-8">
            <div class="page__title">
                <p class="text-lg font-semibold text-gray-900">404 Error</p>
            </div>
        </div>
        <div class="wrapper p-8 text-center">
            <div class="xl:w-1/3 lg:w-1/3 md:w-1/2 sm:w-100 w-100  my-0 mx-auto">
                <img src="img/icons/notfound.svg" class="h-32 my-0 mx-auto">
                <p class="text-blue-600 text-6xl font-bold text-shadow-blue-600">404</p>
                <p class="uppercase text-red text-xl font-semibold">PAGE NOT FOUND</p>
                <p class="text-gray-900 text-sm my-5">It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. Here's a little tip that might help you get back on track.</p>
                <router-link to="/dashboard" href="" class="btn btn-primary">Return to Dashboard</router-link>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  
}
</script>