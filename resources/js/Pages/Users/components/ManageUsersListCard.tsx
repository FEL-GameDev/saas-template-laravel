import Card from "@/Components/Card";
import ManageUsersListItem from "./ManageUsersListItem";
import { UserEditable } from "@/types/user/UserTypes";
import { FC } from "react";

interface ManageUsersListCardProps {
    users: UserEditable[];
}

const ManageUsersListCard: FC<ManageUsersListCardProps> = ({ users }) => {
    return (
        <Card
            heading="Users"
            className="max-w-xl"
            subheading="Select a user to edit their details."
        >
            <div className="flex flex-row flex-1 gap-4">
                {users.map((user) => (
                    <ManageUsersListItem user={user} key={user.id} />
                ))}
            </div>
        </Card>
    );
};

export default ManageUsersListCard;
