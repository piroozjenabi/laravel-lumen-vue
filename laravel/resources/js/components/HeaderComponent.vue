<template>
  <div>
    <v-app-bar
      fixed
      color="#43a047"
      dark
      shrink-on-scroll
      prominent
      src="https://picsum.photos/1920/1080?random"
      fade-img-on-scroll
      scroll-target="#scrolling-techniques-5"
      scroll-threshold="200"
    >
      <template v-slot:img="{ props }">
        <v-img v-bind="props" gradient="to top right, rgba(55,236,186,.7), rgba(25,32,72,.7)"></v-img>
      </template>

      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

      <v-toolbar-title>PIROOZ JENABI - EXAM</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon @click="go('https://www.piero.ir/en')">
        <v-icon>mdi-link</v-icon>
      </v-btn>

      <v-btn icon @click="go('https://ir.linkedin.com/in/pirooz-jenabi-19095697')">
        <v-icon>mdi-linkedin</v-icon>
      </v-btn>

    </v-app-bar>
    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list nav dense>
        <v-list-item-group v-model="group" active-class="deep-purple--text text--accent-4">
          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title @click="go('https://piroozjenabi.herokuapp.com/')">Home</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-arrow-down-bold-circle</v-icon>
            </v-list-item-icon>
            <v-list-item-title @click="go('https://piroozjenabi.herokuapp.com/source.zip')" >Download source</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <v-bottom-navigation :value="true" grow color="#43a047" fixed horizontal>
      <v-btn @click="go('https://piroozjenabi.herokuapp.com/source.zip')">
        <span  >Application</span>
        <v-icon>mdi-crown</v-icon>
      </v-btn>

      <v-btn @click="go('https://piroozjenabi.herokuapp.com/source.zip')">
        <span>Source</span>
        <v-icon >mdi-arrow-down-bold-circle</v-icon>
      </v-btn>

      <v-btn @click="go('https://piroozjenabi.herokuapp.com/lumen/public')">
        <span>Webservice</span>
        <v-icon >mdi-cube</v-icon>
      </v-btn>
    </v-bottom-navigation>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component header mounted.");
  },
  data: () => ({
    drawer: false,
    activeBtn: true
  }),
  methods : {
      go : function (url){
          window.location.replace(url);
      }
  }
};
</script>
