const app = Vue.createApp({})

app.component('v-teams', {
    template: `<div>
		<div class="filter">
			<div class="form-group">
			<label for="team" class="body-text-large">Поиск команды</label>
				<input
					class="form-control"
					type="text"
					v-model="searchValue"
					@keyup="searchTeam"
					placeholder="Начните указывать название команды"
				>
			</div>
			<div class="form-group">
				<label for="task" class="body-text-large">Задача</label>
				<select
					id="task"
					@change="inFilter"
					v-model="teamTaskId"
					class="form-control"
					placeholder="Начните указывать название команды или задачи"
				>
					<option value="">Все задачи</option>
					<option v-for="task in tasks"
						:key="task.id"
						:value="task.id"
					>{{ task.name }}</option>
				</select>
			</div>
		</div>

		<div class="teams-list" v-if="this.teams.length > 0">
			<div class="teams-item" v-for="(team, index) in teamsOut">
				<a href="#" class="team-link team-wrapper">
					<div class="team-title">
					<div class="name title-text-light">{{ team.team }}</div>
					<div class="users">
					<div class="users-list">
					<div class="user"><img src="/images/users/user-1.jpg" alt="Имя Фамилия">
					</div>
					<div class="user"><img src="/images/users/user-2.jpg" alt="Имя Фамилия">
					</div>
					<div class="user"><img src="/images/users/user-3.jpg" alt="Имя Фамилия">
					</div>
					<div class="user"><img src="/images/users/user-1.jpg" alt="Имя Фамилия">
					</div>
					<div class="user"><img src="/images/users/user-2.jpg" alt="Имя Фамилия">
					</div>
					<div class="user"><img src="/images/users/user-3.jpg" alt="Имя Фамилия">
					</div>
					</div>
					<div class="users-count body-text-medium">+ 6</div>
					</div>
					</div>
					<div v-if="team.Task" class="team-task">
						<div class="title body-text-small">Задача</div>
						<div v-if="team.Task" class="text body-text-medium">{{ team.Task }}</div>
					</div>
					<div v-else class="team-task">
						<div class="title body-text-small">Задача не выбрана</div>
					</div>
				</a>
				<a class="apply-button button button__block button__light button__small">Подать заявку</a>
			</div>
        </div>

        <div v-else class="d-flex justify-content-center">
            <div class="spinner-border text-primary m-5" role="status">
              <span class="sr-only m-auto">Loading...</span>
            </div>
        </div>
        <div class="mt-4 text-center" v-if="this.teams.length > 0 && this.teamsOut.length === 0">Ничего не найдено</div>
        </div>`,

    created() {
        this.getTeams(this.apiUrl, this.apiUrl2).then()
    },

    data: function(){
        return {
            apiUrl: '/personal/team/search',
			apiUrl2: '/personal/task/search',
            searchValue: "",
            minSymbolCount: 3,
			teamsOut: [],
            teams: [],
			tasks: [],
			teamTaskId: ''
        }
    },

    methods: {
        // список команд
        async getTeams(url, url2) {
            await axios
                .get(url)
                .then(response => (this.teams = response.data))
				.then(
					await axios
						.get(url2)
						.then(response => (this.tasks = response.data))
				)
                .catch(error => alert(error));
            this.teamsOut = this.teams;
        },

		inFilter() {
			let self = this;
			if (self.teamTaskId !== '') {
				this.teamsOut = self.teams;
				let inFilter = self.teamsOut.filter(function (item) {
					return (
						self.teamTaskId === item.id
					)
				});
				this.teamsOut = inFilter;
			} else {
				this.teamsOut = this.teams;
			}
			this.searchValue = '';
		},
    },

	computed:{
		searchTeam(){
			if (this.searchValue.length >= this.minSymbolCount){
				let searchValue = this.searchValue;
				let inFilter =  this.teams.filter(function(item, index, arr) {
					return (
						item.team.toUpperCase().indexOf(searchValue.toUpperCase()) >= 0
					)
				});
				this.teamsOut = inFilter;
				this.teamTask = '';
			} else {
				this.teamsOut = this.teams;
			}
		},
	}
	
})

app.mount('#app')
