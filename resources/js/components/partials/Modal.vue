<template>
    <transition name="modal">
        <div class="modal">
            <div class="modal-overlay">
            </div>
            <div class="modal-container">
                <div class="modal-close top-0 right-0 absolute flex flex-col items-center mt-4 mr-4 text-white" @click="$emit('close')">
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                      <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <slot name="modal-title"></slot>
                        <div class="modal-close cursor-pointer z-50" @click="$emit('close')">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="modal-body">
                        <slot name="modal-body"></slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="modal-footer"></slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
  
}
</script>