<template>

  <v-table>
    <thead>
    <tr>
      <th class="text-left">
        Name
      </th>
      <th class="text-left">
        Calories
      </th>
    </tr>
    </thead>
    <tbody>
    <tr
        v-for="item in desserts"
        :key="item.name"
    >
      <td>{{ item.name }}</td>
      <td>{{ item.calories }}</td>
    </tr>
    </tbody>
  </v-table>
</template>

<script setup lang="ts">
import {VTable} from 'vuetify/components'

const desserts = [
  {name: 'Cake', calories: 300},
  {name: 'Ice Cream', calories: 200},
  {name: 'Pie', calories: 400},
];
</script>
