<template>

  <v-table>

    <tr>
      <td v-for="item in columns" :key="item.value">{{ item.name }}</td>

    </tr>
  </v-table>
</template>

<script setup lang="ts">
import {VTable} from 'vuetify/components'


</script>
